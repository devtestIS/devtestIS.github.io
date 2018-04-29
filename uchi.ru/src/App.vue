<template>
  <main id="app">
    <form>
      <SumQuestion/>
      <ScalePanel/>
    </form>
  </main>
</template>

<script>

import SumQuestion from './components/SumQuestion'
import ScalePanel from './components/ScalePanel'

export default {
  name: 'App',
  components: {
    ScalePanel,
    SumQuestion
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
