<template>
    <form :action="action" :method="method === 'get' ? 'get' : 'post'" :enctype="enctype" :class="cssClass" :id="formId">
        <input v-if="defineMethod" type="hidden" name="_token" :value="token">
        <input v-if="method != 'get'" type="hidden" name="_method" :value="method">
        <slot></slot>
    </form>
</template>

<script>
export default {
  props: ["css-class", "action", "method", "enctype", "token", "formId"],
  data: () => {
    return {
      updatedMethod: ""
    }
  },
  methods: {
   
  },
  computed: {
    defineMethod: () => {
      var vm = this;
      var method = (vm.method + '').toLowerCase();

      return method === 'get' ? 'get' : 'post';
    }
  },
  created: ()=> {
  }
};
</script>

<style scoped>

</style>