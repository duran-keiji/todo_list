<template>
  <v-app>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-6">
          <v-form v-on:submit.prevent="submit">
            <div>
              <div>
                <div class="form-row" style="height: 80px">
                  <label for="priority" class="col-sm-3 col-form-label">Priority</label>
                  <v-col cols="9" sm="4" id="form-text">
                    <v-select
                      v-model="selected"
                      dense
                      outlined
                      :items="options"
                      item-text="text"
                      item-value="value"
                      return-object
                    ></v-select>
                  </v-col>
                </div>

                <div class="form-row">
                  <label for="title" class="col-sm-3 col-form-label">Title</label>
                  <v-col cols="9" sm="”4”" id="form-text">
                    <v-text-field id="title" v-model="task.title"></v-text-field>
                  </v-col>
                </div>

                <div class="form-row">
                  <label for="content" class="col-sm-3 col-form-label">Content</label>
                  <v-col cols="9" sm="”4”" id="form-text">
                    <v-textarea id="content" v-model="task.content" outlined></v-textarea>
                  </v-col>
                </div>

                <div class="form-row" style="height: 80px">
                  <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                  <v-col cols="9" sm="”4”" id="form-text">
                    <v-text-field id="person-in-charge" v-model="task.person_in_charge"></v-text-field>
                  </v-col>
                </div>
              </div>
              <v-btn
                v-on:click="createTask"
                type="button"
                color="primary"
                dark
                class="btn btn-primary"
              >Submit</v-btn>
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
      task: {},
      selected: { text: "中", value: 2 },
      options: [
        { text: "高", value: 1 },
        { text: "中", value: 2 },
        { text: "低", value: 3 }
      ]
    };
  },
  methods: {
    createTask() {
      this.task.priority = this.selected.value;
      axios.post("/api/tasks", this.task).then(res => {
        this.$router.push({ name: "task.list" });
      });
    }
  }
};
</script>

  <style scoped>
.form-row {
  display: flex;
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