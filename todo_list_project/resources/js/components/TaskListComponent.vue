<template>
    <v-app>

        <div class="container">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="width:100px">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col" style="width:300px">Person In Charge</th>
                        <th id="show" scope="col" style="width:100px">Show</th>
                        <th id="edit" scope="col" style="width:80px">Edit</th>
                        <th id="delete" scope="col" style="width:100px">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="task in tasks" v-bind:key="task.id">
                        <td scope="row">{{ task.id }}</td>
                        <td>{{ task.title }}</td>
                        <td>{{ task.content }}</td>
                        <td>{{ task.person_in_charge }}</td>
                        <td>
                            <router-link v-bind:to="{ name: 'task.show', params: {taskId: Number(task.id)} }">
                                <v-btn color="primary" dark class="show_btn btn-primary">Show</v-btn>
                            </router-link>
                        </td>
                        <td>
                            <router-link v-bind:to="{ name: 'task.edit', params: {taskId: Number(task.id)} }">
                                <v-btn color="teal" dark  class="btn edit_btn-success">Edit</v-btn>
                            </router-link>
                        </td>
                        <td>
                            <v-btn v-on:click="deleteTask(task.id)" color="red" dark class="delete_btn btn-danger">Delete</v-btn>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </v-app>
 </template>
 
 <script>
    export default {
        data: function () {
            return {
                tasks: []
            }
        },
        methods: {
            getTasks() {
                axios.get('/api/tasks')
                    .then((res) => {
                        this.tasks = res.data;
                    });
            },
            deleteTask(taskId) {
                axios.delete('/api/tasks/' + taskId)
                    .then((res) => {
                        this.getTasks();
                    });
            }
        },
        mounted() {
            this.getTasks();
        }
    }
 </script>

 <style scoped>
    #show {
         padding-left : 32px;
     }
     #edit {
         padding-left : 32px;
     }
     #delete {
         padding-left : 32px;
     }
 
 </style>>
