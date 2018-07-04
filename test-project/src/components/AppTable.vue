<template>
  <v-card>
    <v-card-title>
      Занимаемые должности
      <v-spacer></v-spacer>
      <v-text-field v-model="search" append-icon="search" label="Поиск по сотруднику" single-line hide-details></v-text-field>
      <div class="control-buttons-panel">
        <v-btn color="success">Принять на Должность</v-btn>
        <v-btn color="success" v-bind:disabled="selected.length === 0">{{ checkLabel }}</v-btn>
        <v-checkbox :label="`Показывать уволенных`" v-model="showFired" primary hide-details></v-checkbox>
      </div>
    </v-card-title>
    <v-data-table v-model="selected" :headers="headers" :items="employees" :pagination.sync="pagination" :search="search" :custom-filter="customFilter" select-all item-key="name" class="elevation-1">
      <template slot="headers" slot-scope="props">
            <tr>
              <th>
                <v-checkbox :input-value="props.all" :indeterminate="props.indeterminate" primary hide-details @click.native="toggleAll"></v-checkbox>
              </th>
              <th v-for="header in props.headers" :key="header.text" :class="['column sortable', pagination.descending ? 'desc' : 'asc', header.value === pagination.sortBy ? 'active' : '']" @click="changeSort(header.value)">
                <v-icon small>arrow_upward</v-icon>
                {{ header.text }}
              </th>
            </tr>
</template>
<template slot="items" slot-scope="props">
  <tr v-if="showFired || props.item.fireDate === null" v-bind:class="{ 'red lighten-3': props.item.fireDate }">
    <td>
      <v-checkbox v-if="props.item.fireDate === null" v-model="props.selected" primary hide-details></v-checkbox>
    </td>
    <td class="text-xs-center">{{ props.item.name }}</td>
    <td class="text-xs-center">{{ props.item.companyName }}</td>
    <td class="text-xs-center">{{ props.item.positionName }}</td>
    <td class="text-xs-center">{{ props.item.hireDate }}</td>
    <td class="text-xs-center">{{ props.item.fireDate }}</td>
    <td class="text-xs-center">
      <v-edit-dialog v-bind:class="{ 'disable-click': props.item.fireDate}" large lazy persistent @save="save" @cancel="cancel" @open="open" @close="close"> {{ props.item.salary + ' ₽(' + props.item.fraction + '%)' }}
        <div slot="input" class="mt-3 title">Ставка руб.</div>
        <v-text-field v-bind:disabled="props.item.fireDate" slot="input" v-model="props.item.salary" :rules="[max25chars]" label="Edit" single-line counter autofocus></v-text-field>
        <div slot="input" class="mt-3 title">Ставка %</div>
        <v-text-field v-bind:disabled="props.item.fireDate" slot="input" v-model="props.item.fraction" :rules="[max3chars]" label="Edit" single-line counter autofocus></v-text-field>
      </v-edit-dialog>
    </td>
    <td class="text-xs-center">
      <v-edit-dialog v-bind:class="{ 'disable-click': props.item.fireDate}" large lazy persistent @save="save" @cancel="cancel" @open="open" @close="close"> {{ props.item.base }}
        <div slot="input" class="mt-3 title">База</div>
        <v-text-field slot="input" v-model="props.item.base" :rules="[max25chars]" label="Edit" single-line counter autofocus></v-text-field>
      </v-edit-dialog>
    </td>
    <td class="text-xs-center">
      <v-edit-dialog v-bind:class="{ 'disable-click': props.item.fireDate}" large lazy persistent @save="save" @cancel="cancel" @open="open" @close="close"> {{ props.item.advance }}
        <div slot="input" class="mt-3 title">Аванс</div>
        <v-text-field slot="input" v-model="props.item.advance" :rules="[max25chars]" label="Edit" single-line counter autofocus></v-text-field>
      </v-edit-dialog>
    </td>
    <td class="text-xs-center">
      <v-checkbox v-bind:class="{ 'disable-click': props.item.fireDate}" class="d-inline-block" v-model="props.item.byHours" primary hide-details></v-checkbox>
    </td>
  </tr>
</template>
<template slot="pageText" slot-scope="props">
   От {{ props.pageStart }} - {{ props.pageStop }} до {{ props.itemsLength }}
</template>
        <v-alert slot="no-results" :value="true" color="error" icon="warning">
          Your search for "{{ search }}" found no results.
        </v-alert>
      </v-data-table>
      <v-snackbar v-model="snack" :timeout="3000" :color="snackColor">
        {{ snackText }}
        <v-btn flat @click="snack = false">Close</v-btn>
      </v-snackbar>
  </v-card>
</template>

<style lang="scss">
  .control-buttons-panel {
    display: flex;
    width: 100%;
    flex-direction: row;
    justify-content: flex-end;
    align-items: center;
    margin-top: 20px;
    .v-input {
      margin-top: 0;
      flex: 0 0 auto;
    }
  }
  .disable-click {
    pointer-events: none;
  }
  .v-datatable thead th.column.sortable {
    position: relative;
  }
  .column>.v-icon {
    position: absolute;
    left: 10px;
    top: 20px;
  }
  .v-menu__activator {
    display: inline-block;
  }
</style>

<script>
  import { employeesData, headersData } from '../data/data.js';

  export default {
    data: () => ({
      pagination: {
        sortBy: "name"
      },
      showFired: true,
      search: '',
      selected: [],
      snack: false,
      snackColor: '',
      snackText: '',
      max25chars: (v) => v.length <= 25 || 'Input too long!',
      max3chars: (v) => v.length <= 3 || 'Input too long!',
      headers: headersData,
      employees: employeesData
    }),
    methods: {
      toggleAll() {
        if (this.selected.length) {
          this.selected = [];
        } else {
          this.selected = this.employees.filter(item => item.fireDate === null);
        }
      },
      changeSort(column) {
        if (this.pagination.sortBy === column) {
          this.pagination.descending = !this.pagination.descending;
        } else {
          this.pagination.sortBy = column;
          this.pagination.descending = false;
        }
      },
      customFilter(items, search, filter) {
        search = search.toString().toLowerCase()
        return items.filter(column => filter(column["name"], search))
      },
      save() {
        this.snack = true
        this.snackColor = 'success'
        this.snackText = 'Сохранено'
      },
      cancel() {
        this.snack = true
        this.snackColor = 'error'
        this.snackText = 'Отменено'
      },
      open() {
        this.snack = true
        this.snackColor = 'info'
        this.snackText = 'Редактирование'
      },
      close() {
        console.log('closed')
      }
    },
    computed: {
      checkLabel: function() {
        return this.selected.length <= 1 ? 'Снять с должности' : 'Снять с должностей'
      }
    }
  };
</script>
