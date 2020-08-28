<template>
  <v-card>
    <v-container>
      <v-row>
        <v-col cols="6">
          <v-row>
            <v-col cols="4">
              <v-img :src="avatar" :lazy-src="avatar" class="grey lighten-2">
                <template v-slot:placeholder>
                  <v-row
                    class="fill-height ma-0"
                    align="center"
                    justify="center"
                  >
                    <v-progress-circular
                      indeterminate
                      color="grey lighten-5"
                    ></v-progress-circular>
                  </v-row>
                </template>
              </v-img>
            </v-col>
            <v-col>
              <v-card-title>Обо мне</v-card-title>
              <v-card-text>{{ bio }}</v-card-text>
            </v-col>
          </v-row>
        </v-col>
        <v-col cols="6">
          <EmailForm />
        </v-col>
      </v-row>
    </v-container>
  </v-card>
</template>

<script>
import EmailForm from '@/components/EmailForm'
import { createNamespacedHelpers } from 'vuex'

const { mapState } = createNamespacedHelpers('user')
export default {
  name: 'ProfileContent',
  components: {
    EmailForm,
  },
  computed: {
    ...mapState(['avatar', 'name', 'bio']),
  },
}
</script>

<style lang="scss" scoped></style>
