<template>
	<form @submit.prevent="savePokemon">
		<div class="form-group">
			<label>Pokemon</label>
			<input type="text" class="form-control" placeholder="Ingresa el nombre del pokemon" v-model="name">
		</div>
		<div class="form-group">
			<label>Picture</label>
			<input type="text" class="form-control" placeholder="Ingresa la url de una imagen" v-model="picture">
		</div>
			<button type="submit" class="btn btn-primary">Save</button>
	</form>
</template>
<script type="text/javascript">
	export default {
        mounted() {
            console.log('RespelComponent mounted.')
        }
    }
</script>