<template>
  <q-layout class="q-my-xl">
    <div class="row full-width justify-center">
      <q-card style="min-width: 650px">
        <q-card-title>Prihlásenie</q-card-title>

        <q-card-main>

          <q-field :count="250">
            <q-input
              float-label="Email"
              v-model="email"
              type="email"
            />
          </q-field>

          <q-field :count="250">
            <q-input
              float-label="Heslo"
              v-model="password"
              type="password"
            />
          </q-field>

        </q-card-main>

        <q-card-actions class="q-mt-md">
          <div class="row justify-end full-width docs-btn">
            <q-btn label="Späť" flat @click="eshopRedirect" />
            <q-btn label="Prihlásiť" color="primary" @click="login" />
          </div>
        </q-card-actions>

      </q-card>
    </div>
  </q-layout>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      email: '',
      password: '',
    }
  },
  methods: {
    login() {
      axios
        .post('http://127.0.0.1:8000/admin/login', { email: this.email, password: this.password})
        .then((response) => {
          if (response.data.message === true) {
            this.$router.push("/products/index");
          } else {
            this.$q.notify({ type: 'negative', timeout: 2000, message: 'Nesprávne prihlasovacie údaje.' });
          }
        })
        .catch((error) => {
          this.$q.notify({ type: 'negative', timeout: 2000, message: 'Vyskytol sa problém.' });
          console.log(error);
        });
    },
    eshopRedirect() {
      window.location = '/';
    }
  }
}
</script>

<style scoped>

</style>
