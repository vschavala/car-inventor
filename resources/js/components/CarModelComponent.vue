<template>
<div class="container">	
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
               Model Added successfully
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  @click="addModel()">View Inventors</button>
              </div>
            </div>
          </div>
        </div>
	<div class="row justify-content-center">
      <div class="col-md-10">	
	<div class="card">
	<div class="card-header">Add Car Model</div>	
	<form v-on:submit="saveForm()" id="carmodel">
	
	
	<div class="row">
		<div class="col-md-6">
			<label>Car Model</label>
			
			<input type="text" name="model_name" v-model = "model_name" class="form-control" required="">
		</div>
		<div class="col-md-6">
			<label>Select Manufacturer</label>
		<select class="form-control" name="manufacturer_id" v-model = "manufacturer_id" required>	
			<option value=""disabled selected>Select</option>
			<option v-for="manufacturers in items"  :value="manufacturers.id">{{ manufacturers.name }}</option>
		</select>	
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-4">
			<label>Color</label>
			<input type="text" name="color" v-model = "color" class="form-control">
		</div>
		<div class="col-md-4">
			<label>Manufacturing Year</label>
			<input type="text" name="year" v-model = "year" class="form-control">
		</div>
		<div class="col-md-4">
			<label>Registration number</label>
		<input type="text" name="registration_number" v-model = "registration_number" class="form-control" required>	
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-4">
			<label>Image Upload1</label>
			<input type="file" name="image1"  v-on:change="image1" class="form-control">
		</div>
		<div class="col-md-4">
			<label>Image Upload2</label>
		<input type="file" name="image2"  v-on:change="image2" class="form-control">	
		</div>
		<div class="col-md-4 mt-4">
            <button class="btn btn-primary">Submit</button>
        </div>
	</div>

	</form>

	</div>
</div>
</div>
</div>
</template>
<script lang="ts">

    export default {
    	 props: ['manufact'],
    	 props: ['model_name'],
    	 props: ['manufacturer_id'],
    	 props: ['color'],
    	 props: ['year'],
    	 props: ['registration_number'],
    	 props: ['items'],
    	 manufact:  [],

        data: function () {
            return {
            	manufact: {
                    model_name:'',
                    manufacturer_id:0,
                    name:'',
                    color:'',
                    year:'',
                    registration_number:'',
                    image1:'',
                    image2:'',
                },
                manufacturer_id:0,
            }
        },
        methods: { saveForm() {
                event.preventDefault();
                let myForm = document.getElementById('carmodel');

				let formData = new FormData(myForm);
                axios.post('/carmodel', formData)
                    .then(function (resp) {
                        
                        if(resp){
                            $('#manufaturer').modal('show');
                            $("#carmodel")[0].reset();
                        }
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            },
            
            addModel(){
            	location.href = '/inventoryview';
        }
        },
        
        mounted(){
        	
        	this.getResult();
        }
    }
</script>
<style type="text/css">
	.carmodel{
		background-color: #fff !important;
	}
	#carmodel{
		padding: 55px;
	}
	.car_model_btn{
		    margin-top: 29px;
	}
</style>
