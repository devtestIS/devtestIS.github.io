<template>
  <v-card>
    <v-card-title>
      Занимаемые должности
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Поиск по сотруднику"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table 
      v-model="selected" 
      :headers="headers" 
      :items="employees" 
      :pagination.sync="pagination" 
      :search="search"
      :custom-filter="customFilter"
      select-all 
      item-key="name" 
      class="elevation-1">
        <template slot="headers" slot-scope="props">
          <tr>
            <th>
              <v-checkbox
                :input-value="props.all"
                :indeterminate="props.indeterminate"
                primary
                hide-details
                @click.native="toggleAll"
              ></v-checkbox>
              </th>
              <th
                v-for="header in props.headers"
                :key="header.text"
                :class="['column sortable', pagination.descending ? 'desc' : 'asc', header.value === pagination.sortBy ? 'active' : '']"
                @click="changeSort(header.value)"
              >
              <v-icon small>arrow_upward</v-icon>
              {{ header.text }}
            </th>
          </tr>
        </template>
        <template slot="items" slot-scope="props">
          <tr v-bind:class="{ 'red lighten-3': props.item.fireDate }" :active="props.selected" @click="props.selected = !props.selected">
            <td>
              <v-checkbox :input-value="props.selected" primary hide-details></v-checkbox>
            </td>
            <td class="text-xs-center">{{ props.item.name }}</td>
            <td class="text-xs-center">{{ props.item.companyName }}</td>
            <td class="text-xs-center">{{ props.item.positionName }}</td>
            <td class="text-xs-center">{{ props.item.hireDate }}</td>
            <td class="text-xs-center">{{ props.item.fireDate }}</td>
            <td class="text-xs-center">{{ props.item.salary + ' ₽(' + props.item.fraction + '%)' }}</td>
            <td class="text-xs-center">{{ props.item.base }}</td>
            <td class="text-xs-center">{{ props.item.advance }}</td>
            <td class="text-xs-center">
              <v-checkbox class="d-inline-block" v-model="props.item.byHours" primary hide-details></v-checkbox>
            </td>
          </tr>
        </template>
        <v-alert slot="no-results" :value="true" color="error" icon="warning">
          Your search for "{{ search }}" found no results.
        </v-alert>
      </v-data-table>
  </v-card>
</template>

<script>
  export default {
    data: () => ({
      pagination: {
        sortBy: "name"
      },
      search: '',
      selected: [],
      headers: [{
          text: "Сотрудник",
          align: "left",
          sortable: true,
          value: "name"
        },
        {
          text: "Компания",
          value: "companyName"
        },
        {
          text: "Должность",
          value: "positionName"
        },
        {
          text: "Дата приема",
          value: "hireDate"
        },
        {
          text: "Дата увольнения",
          value: "fireDate"
        },
        {
          text: "Ставка",
          value: "salary"
        },
        {
          text: "База",
          value: "base"
        },
        {
          text: "Аванс",
          value: "advance"
        },
        {
          text: "Почасовая",
          value: "byHours"
        }
      ],
      employees: [{
          value: false,
          name: "Джордж Вашингтон",
          companyName: 'ООО "Синергия"',
          positionName: "Первый президент США",
          hireDate: "1789-04-30",
          fireDate: "1797-03-04",
          salary: 1000,
          fraction: 100,
          base: 1000,
          advance: 1000,
          byHours: false
        },
        {
          value: false,
          name: "Ричард I Львиное Сердце",
          companyName: 'ООО "Синергия"',
          positionName: "Король Англии",
          hireDate: "1189-01-01",
          fireDate: "1199-05-17",
          salary: 1000,
          fraction: 100,
          base: 1000,
          advance: 1000,
          byHours: true
        },
        {
          value: false,
          name: "Джейсон Стейтем",
          companyName: 'ООО "Синергия"',
          positionName: "Бейкон",
          hireDate: "1998-09-01",
          fireDate: null,
          salary: 1000,
          fraction: 100,
          base: 1000,
          advance: 1000,
          byHours: false
        },
        {
          value: false,
          name: "Тарантино К. Дж.",
          companyName: 'ООО "Синергия"',
          positionName: "Джимми",
          hireDate: "1994-04-15",
          fireDate: null,
          salary: 1000,
          fraction: 100,
          base: 1000,
          advance: 1000,
          byHours: false
        },
        {
          value: false,
          name: "Камбербэтч Б.",
          companyName: 'ООО "Синергия"',
          positionName: "Смауг",
          hireDate: "1000-01-01",
          fireDate: "2941-10-09",
          salary: 1000,
          fraction: 100,
          base: 1000,
          advance: 1000,
          byHours: false
        },
        {
          value: false,
          name: "Крузенштерн И. Ф.",
          companyName: 'ООО "Синергия"',
          positionName: "Человек и пароход",
          hireDate: "1770-11-08",
          fireDate: null,
          salary: 1000,
          fraction: 100,
          base: 1000,
          advance: 1000,
          byHours: false
        },
        {
          value: false,
          name: "Бендер С. Р.",
          companyName: '"Planet Express"',
          positionName: "Робот-сгибальщик",
          hireDate: "2997-03-27",
          fireDate: null,
          salary: 1000,
          fraction: 100,
          base: 1000,
          advance: 1000,
          byHours: true
        }
      ]
    }),
    methods: {
      toggleAll() {
        if (this.selected.length) {
          this.selected = [];
        } else {
          this.selected = this.employees.slice();
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
        }
    }
  };
</script>
