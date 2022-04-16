<template>
  <RegistrationForm/>
</template>

<script>
  import "bootstrap/dist/css/bootstrap.min.css"
  import "bootstrap"

import RegistrationForm from "./components/RegistrationForm";

export default {
  name: 'App',
  components: {
    RegistrationForm
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
