 <template>
    <v-app>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <v-form v-on:submit.prevent="updateTask">
                        <div>    
                            <v-row>
                                <div class="form-row">
                                    <label for="id" class="col-sm-3 col-form-label">ID</label>
                                    <v-col cols="9" sm=”4” id="form-text">
                                        <p class="col-sm-9 form-control-plaintext" readonly id="id" v-bind:value="taskId">{{ taskId }}</p>
                                    </v-col>
                                </div>
                        
                                <div class="form-row">
                                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                                    <v-col cols="9" sm=”4” id="form-text">
                                        <v-text-field
                                            id="title"
                                            v-model="task.title"
                                            clearable
                                        >
                                        </v-text-field>
                                    </v-col>
                                </div>

                                <div class="form-row">
                                    <label for="content" class="col-sm-3 col-form-label">Content</label>
                                    <v-col cols="9" sm=”4” id="form-text">
                                        <v-text-field
                                            id="content"
                                            v-model="task.content"
                                            clearable
                                        >
                                        </v-text-field>
                                    </v-col>
                                </div>

                                <div class="form-row">
                                    <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                                    <v-col cols="9" sm=”4” id="form-text">
                                        <v-text-field
                                            id="person-in-charge"
                                            v-model="task.person_in_charge"
                                            clearable
                                        >
                                        </v-text-field>
                                    </v-col>
                                </div>
                            </v-row>
                            <v-btn type="submit" color="primary" dark class="btn btn-primary">Submit</v-btn>
                        </div>
                    </v-form>
                </div>
            </div>
        </div>
    </v-app>
 </template>
 
 <script>
    export default {
        props: {
            taskId: Number
        },
        data: function () {
            return {
                task: {}
            }
        },
        methods: {
            getTask() {
                axios.get('/api/tasks/' + this.taskId )
                    .then((res) => {
                        this.task = res.data;
                    });
            },
            updateTask() {
                axios.put('/api/tasks/' + this.taskId, this.task)
                    .then((res) => {
                        this.$router.push({ name: 'task.list' });
                    });
            }
        },
        mounted() {
            this.getTask();
        }
    }
 </script>

 <style scoped>
    .form-row {
        display: contents;
    }
    #form-text {
        margin-top: -13.5px;
    }
    .btn {
        display: block;
        margin: 40px 0 0 auto;
    }

 </style>