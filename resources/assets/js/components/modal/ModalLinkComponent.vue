<template>
    <span class="">
        <span v-if="item">
            <button v-if="type != 'link'" 
                @click="fillForm(item, url)"
                type="button" :class="cssClass || 'btn btn-primary'" data-toggle="modal" :data-target="'#' + modalName">
                {{ title }}
            </button>

            <a v-if="type == 'link' " type="button" :class="cssClass" 
                @click="fillForm(item, url)"
                data-toggle="modal" :data-target="'#' + modalName">
                {{ title }}
            </a>
        </span>
        <span v-else>
            <button v-if="type != 'link'" 
                type="button" :class="cssClass || 'btn btn-primary'" data-toggle="modal" :data-target="'#' + modalName">
                {{ title }} 
            </button>

            <a v-if="type == 'link' " type="button" :class="cssClass" data-toggle="modal" :data-target="'#' + modalName">
                {{ title }}
            </a>
        </span>
       
    </span>
</template>

<script>
import store from '../../store';
export default {
  props: ["type", "modalName", "title", "cssClass", "item", "url"],
  methods: {
    fillForm: (item, url)=> {  
      let vm = this;  
      console.log(vm.url);
      axios.get(url + item.id).then(res => {
          store.commit('setItem', res.data);
      });
      
    }
  }
};
</script>

<style scoped>

</style>