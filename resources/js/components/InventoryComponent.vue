<template>
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-10">	
	<div class="card">
	<div class="card-header"><strong>Inventors</strong></div>
    <b-table striped hover :items="items"></b-table>
  </div>
</div>
</div>
</div>  
</template>

<script>
  export default {
  props: ['items'],
    data() {
      return {
        
      }
    }
  }
</script>