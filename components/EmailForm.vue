<template>
  <v-form>
    <v-text-field
      v-model="emailName"
      outlined
      clearable
      label="От кого"
    ></v-text-field>
    <v-text-field
      v-model="emailSender"
      type="email"
      outlined
      clearable
      label="Email"
      placeholder="example@mail.com"
    ></v-text-field>
    <v-textarea
      v-model="emailText"
      outlined
      clearable
      :no-resize="true"
      label="Сообщение"
    ></v-textarea>
    <v-btn @click="sendEmail">Отправить сообщение</v-btn>
  </v-form>
</template>

<script>
import { createNamespacedHelpers } from 'vuex'

const { mapState, mapActions } = createNamespacedHelpers('email')
export default {
  name: '',
  computed: {
    ...mapState(['sender', 'name', 'text', 'message']),
    emailSender: {
      get() {
        return this.sender
      },
      set(value) {
        this.setSender(value)
      },
    },
    emailName: {
      get() {
        return this.name
      },
      set(value) {
        this.setName(value)
      },
    },
    emailText: {
      get() {
        return this.text
      },
      set(value) {
        this.setText(value)
      },
    },
  },
  methods: {
    ...mapActions(['sendEmail', 'setSender', 'setName', 'setText']),
  },
}
</script>

<style lang="scss" scoped></style>
