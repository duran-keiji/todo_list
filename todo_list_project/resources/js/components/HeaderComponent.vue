<template>
  <v-app background-color="deep-purple accent-4">
    <div background-color="deep-purple accent-4" class="container-fluid mb-3">
      <div class="container">
        <nav class="navbar navbar-dark">
          <router-link v-bind:to="{name: 'task.list'}">
            <span class="navbar-brand mb-0 h1">Todo List</span>
          </router-link>
          <div>
            <router-link v-bind:to="{name: 'task.list'}">
              <v-btn color="deep-orange" class="btn1 btn-success">List</v-btn>
            </router-link>
            <router-link v-bind:to="{name: 'task.create'}">
              <v-btn color="deep-orange" class="btn2 btn-success">ADD</v-btn>
            </router-link>
          </div>
        </nav>
      </div>
    </div>
  </v-app>
</template>
 
 <script>
export default {};
</script>

 <style scoped>
.container-fluid {
  background-color: #004d40;
}
.btn1 {
  margin-right: 15px;
}
</style>