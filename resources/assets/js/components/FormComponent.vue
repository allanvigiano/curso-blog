<template>
    <form :action="action" :method="defineMethod" :enctype="enctype" :class="cssClass">
        <input v-if="token" type="hidden" name="_token" :value="token">
        <input v-if="updateMethod" type="hidden" name="_method" value="defineMethod">
        <slot></slot>
    </form>
</template>

<script>
export default {
  props: ["cssClass", "action", "method", "enctype", "token"],
  data: () => {
    return {
      updateMethod: ""
    }
  },
  computed: {
    defineMethod: () => {
      if(this.method == "post" || this.method == "get" )  {
        return this.method;  
      }

      if(this.method == "put") {
          this.updateMethod = "put";
      }

      if(this.method == "delete") {
          this.updateMethod = "delete";
      }

      return 'post'
    }
  }
};
</script>

<style scoped>

</style>