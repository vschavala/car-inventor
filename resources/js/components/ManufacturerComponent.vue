<template>
    <div class="container">
        <div class="row justify-content-center">
        <div class="modal fade" id="manufaturer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               Manufaturer Added successfully
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="addmodel()">Add Car Model</button>
              </div>
            </div>
          </div>
        </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Manufaturers</div>
                     <form v-on:submit="saveForm()" id="manfac">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>Manufacturer Name:*</label>
                                    <input type="text" name="name" v-model = "name" class="form-control" required>
                                   
                                </div>
                                <div class="col-md-2 mt-4">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            
                        </div>
                    </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    props:['name'],
        data: function () {
            return {
                manufature: {
                    name: '',
                },
                show_alert :false,
                alert_secs :5,
                alert_message : "Message",
                alert_variant : "success",
                alert_title : "Alert",
                
            }
        },
        methods: {
        show_success(title = "Success", message = "success") {
        this.alert_variant = "success";
        this.alert_message = message;
        this.alert_title = title;
        this.show_alert = true;
        console.log(message);
    },
            saveForm() {
                event.preventDefault();
                var app = this;
                
                var newManufacturer = app.manufaturer;
                axios.post('/manufacturer', {name:this.name})
                    .then(function (resp) {
                        
                        if(resp){
                            $('#manufaturer').modal('show');
                            $("#manfac")[0].reset();
                        }
                    })
                    .catch(function (resp) {
                        
                        alert("Could not create your company");
                    });
            },
            addmodel(){
                location.href = '/carmodel';
            },
            mounted(){

            }
        }
    }
</script>
<style type="text/css">
    .manufacture_btn{
            margin-top: 30px;
    }
</style>
