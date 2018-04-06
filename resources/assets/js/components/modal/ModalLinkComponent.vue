<template>
    <div class="">
        <button v-if="type != 'link'" 
            type="button" :class="cssClass || 'btn btn-primary'" data-toggle="modal" :data-target="'#' + modalName">
            {{ title }} 
        </button>

        <a v-if="type == 'link' " type="button" :class="cssClass" data-toggle="modal" :data-target="'#' + modalName">
            {{ title }}
        </a>
    </div>
</template>

<script>
export default {
  props: ["type", "modalName", "title", "cssClass"]        
}
</script>

<style scoped>

</style>