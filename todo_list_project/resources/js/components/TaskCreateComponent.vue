<template>
    <v-app>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <v-form v-on:submit.prevent="submit">
                        <div>
                            <v-row>
                                <div class="form-row">
                                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                                    <v-col cols="9" sm=”4” id="form-text">
                                        <v-text-field
                                            id="title"
                                            v-model="task.title"
                                        >
                                        </v-text-field>
                                    </v-col>
                                </div>

                                <div class="form-row">
                                    <label for="content" class="col-sm-3 col-form-label">Content</label>
                                    <v-col cols="9" sm=”4” id="form-text">
                                        <v-textarea 
                                            id="content"
                                            v-model="task.content"
                                            outlined
                                        >  
                                        </v-textarea>
                                    </v-col>
                                </div>

                                <div class="form-row">
                                    <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                                    <v-col cols="9" sm=”4” id="form-text">
                                        <v-text-field
                                            id="person-in-charge"
                                            v-model="task.person_in_charge"
                                        >
                                        </v-text-field>
                                    </v-col>
                                </div>
                            </v-row>
                            <v-btn v-on:click="createTask" type="button" color="primary" dark class="btn btn-primary">Submit</v-btn>
                        </div>
                    </v-form>
                </div>
            </div>
        </div>
    </v-app>
 </template>
 
 <script>
    export default {
        data: function() {
            return {
                task: {}
            }
        },
        methods: {
            createTask() {
                axios.post('/api/tasks', this.task)
                    .then((res) => {
                        this.$router.push({ name: 'task.list' });
                    });
            }
        }
    }
 </script>

  <style scoped>
    .form-row {
        display: contents;
    }
    #form-text {
        margin-top: -15px;
        margin-bottom: 60px;
    }
    .btn {
        display: block;
        margin: 40px 0 0 auto;
    }
    v-text-field {
        word-wrap: break-word;
    }

 </style>