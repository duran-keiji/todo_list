<template>
  <v-app>
    <div class="container">
      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <!-- <th scope="col" style="width:30px">id</th> -->
            <th scope="col" style="width:30px; text-align:center">Priority</th>
            <th scope="col" style="width:280px">Title</th>
            <th scope="col" style="width:320px; padding-left:38px">Content</th>
            <th scope="col" style="width:100px">Person In Charge</th>
            <!-- <th id="show" scope="col" style="width:100px">Show</th> -->
            <th id="edit" scope="col" style="width:80px">Edit</th>
            <th id="delete" scope="col" style="width:100px">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="task in tasks" v-bind:key="task.id">
            <!-- <td scope="row">{{ task.id }}</td> -->
            <td scope="row" v-bind:class="task.colors" style="text-align:center">{{ task.priority }}</td>
            <td>{{ task.title }}</td>
            <td>
              <v-textarea v-model="task.content" readonly rounded class="content" id="content_area"></v-textarea>
            </td>
            <td>{{ task.person_in_charge }}</td>
            <!-- <td>
                            <router-link v-bind:to="{ name: 'task.show', params: {taskId: Number(task.id)} }">
                                <v-btn color="primary" dark class="show_btn btn-primary">Show</v-btn>
                            </router-link>
            </td>-->
            <td>
              <router-link v-bind:to="{ name: 'task.edit', params: {taskId: Number(task.id)} }">
                <v-btn color="teal" dark class="btn edit_btn-success">Edit</v-btn>
              </router-link>
            </td>
            <td>
              <v-btn
                v-on:click="deleteTask(task.id)"
                color="red"
                dark
                class="delete_btn btn-danger"
              >Delete</v-btn>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </v-app>
</template>
 
 <script>
export default {
  data: function() {
    return {
      tasks: []
    };
  },
  methods: {
    getTasks() {
      axios.get("/api/tasks").then(res => {
        this.tasks = res.data;
        for (var i = 0; i < this.tasks.length; i++) {
          switch (this.tasks[i].priority) {
            case 1:
              this.tasks[i].priority = "高";
              this.tasks[i].colors = "high";
              break;
            case 2:
              this.tasks[i].priority = "中";
              this.tasks[i].colors = "middle";
              break;
            case 3:
              this.tasks[i].priority = "低";
              this.tasks[i].colors = "low";
              break;
          }
        }
      });
    },
    deleteTask(taskId) {
      axios.delete("/api/tasks/" + taskId).then(res => {
        this.getTasks();
      });
    }
  },
  mounted() {
    this.getTasks();
  }
};
</script>

 <style scoped>
#show {
  padding-left: 32px;
}
#edit {
  padding-left: 32px;
}
#delete {
  padding-left: 32px;
}
.content {
  margin-top: 0px;
  padding-top: 0px;
  font-size: 14.4px;
}
.v-input__slot {
  padding-left: 0px !important;
}
.high {
  background: #ef5350;
}
.middle {
  background: #4db6ac;
}
.low {
  background: #64b5f6;
}
</style>>
