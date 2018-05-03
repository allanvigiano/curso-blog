<template>
    <div>
        <div class="form-inline">
            <a v-if="create && !modal" :href="create">Criar link</a>
            <modal-link-component
                v-if="create && modal"
                title="Criar Modal"
                modal-name="add"
                css-class="btn btn-large btn-danger"
            ></modal-link-component>
            <div class="pull-right">
                <input v-model="search" type="search" name="list_search" id="" class="form-control" placeholder="Buscar">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead> 
                <tr>
                    <th v-for="(header) in headers" :key="header.id">
                        <a href="javascript:void(0);" v-on:click="sortCol(header)">{{ header.name }}</a>
                        <!-- <span :style="orderAuxCol == header.id ? 'visibility:visible;' : 'visibility:hidden;'" :class="header.order == 'desc' ? 'ion-android-arrow-dropdown' : 'ion-android-arrow-dropup'"  aria-hidden="true"></span> -->
                    </th>
                    <th v-if="detail || edit || deleteUrl">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, i) in filtredList" :key="i">
                    <td v-for="element in item" :key="element + i">
                        {{ element | formateDate}}
                    </td>
                    <td v-if="detail || edit || deleteUrl">
                        
                        <modal-link-component
                            v-if="create && modal"
                            title="Detalhe"
                            type="link"
                            modal-name="detail"
                            css-class=""
                            :item="item"
                            :url="detail"
                        ></modal-link-component>
                        <modal-link-component
                            v-if="create && !modal"
                            title="Detalhe"
                            type="link"
                            modal-name="detail"
                            css-class=""
                            :url="detail"
                            :item="item"
                        ></modal-link-component>

                        <a v-if="create && !modal" :href="edit">Editar</a>
                        <modal-link-component
                            v-if="create && modal"
                            title="Editar"
                            type="link"
                            modal-name="edit"
                            css-class=""
                            :item="item"
                            :url="detail"
                        ></modal-link-component>
                        <form v-if="deleteUrl && token" :action="deleteUrl + item.id" method="post" :id="'formDelete'+item.id">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" :value="token">
                            <a v-if="deleteUrl" @click="execForm('formDelete' + item.id)"> Excluir</a>
                        </form>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
  data: () => {
    return {
      search: "",
      orderAux: this.order || "asc",
      orderAuxCol: this.col || 1,
      clickedHeader: {
        id: this.col || 1,
        order: this.order || "asc"
      }
    };
  },
  props: [
    "headers",
    "items",
    "detail",
    "token",
    "edit",
    "deleteUrl",
    "create",
    "order", // (asc/desc) ascendent or descent sort
    "col", // (number) column index witch will be sorted
    "modal"
  ],
  methods: {
    execForm: idForm => {
      document.getElementById(idForm).submit();
    },
    sortCol: function(header) {
      if (header.order == "asc" && this.clickedHeader.id == header.id) {
        header.order = "desc";
      } else {
        header.order = "asc";
      }
      //this.clickedHeader = header.id;
      this.clickedHeader.id = header.id;
      this.clickedHeader.order = header.order;
    }
  },
  filters: {
    formateDate: value => {
      value = value.toString();
      if(!value) {
        return ''
      }
      if(value.split('-').length == 3) {
        
        let array = value.split('-')

        return array[2] + '/' + array[1] + '/' + array[0]
      }
      
      return value
    }
  },
  computed: {
    filtredList: function() {
      let list = this.items.data;
      // let order = this.orderAux.toString().toLowerCase();
      let order = this.clickedHeader.order;
      // let col = parseInt(this.orderAuxCol);
      let col = parseInt(this.clickedHeader.id) - 1;

      if (order == "asc") {
        list.sort((a, b) => {
          return Object.values(a)[col] == Object.values(b)[col]
            ? 0
            : Object.values(a)[col] > Object.values(b)[col] ? 1 : -1;
        });
      } else {
        list.sort((a, b) => {
          return Object.values(a)[col] == Object.values(b)[col]
            ? 0
            : Object.values(a)[col] < Object.values(b)[col] ? 1 : -1;
        });
      }

      if (this.search) {
        return list.filter(res => {
          res =  Object.values(res);
          for (let k = 0; k < res.length; k++) {
            if (
              res[k]
                .toString()
                .toLowerCase()
                .indexOf(this.search.toString().toLowerCase()) >= 0
            ) {
              return true;
            } else {
            }
          }
          return false;
        });
      }

      return list;
    }
  }
};
</script>

<style scoped>

</style>