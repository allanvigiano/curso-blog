<template>
    <div>
        <div class="form-inline">
            <a v-if="create" :href="create">Criar</a>
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
                        {{ element }}
                    </td>
                    <td v-if="detail || edit || deleteUrl">
                        <a v-if="detail" href="">Detalhe</a>
                        <a v-if="edit" href="">Editar</a>
                        <form v-if="deleteUrl && token" :action="deleteUrl" method="post" :id="'form'+item[0]">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" :value="token">
                            <a v-if="deleteUrl" :href="deleteUrl" :onclick="'execForm(\'form'+item[0]+')'">Deletar</a>
                        </form>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
  data:() => {
    return {
      search: "", 
      orderAux: this.order || "asc",
      orderAuxCol: this.col || 1,
      clickedHeader: {
        id: this.col || 1,
        order: this.order || "asc",
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
    "order",     // (asc/desc) ascendent or descent sort
    "col"        // (number) column index witch will be sorted
  ],
  methods: {
    execForm: index => {
      document.getElementById(index).submit();
    },
    sortCol: function(header) {
      if (header.order == 'asc' && this.clickedHeader.id == header.id) {
        header.order = 'desc';
      }
      else {
        header.order = 'asc'
      }
      //this.clickedHeader = header.id;
      this.clickedHeader.id = header.id;
      this.clickedHeader.order = header.order;
      console.log(this.orderAux);
    }
  },
  computed: {
    filtredList: function() {
      // let order = this.orderAux.toString().toLowerCase();
      let order = this.clickedHeader.order;
      // let col = parseInt(this.orderAuxCol);
      let col = parseInt(this.clickedHeader.id) - 1;

      if (order == "asc") {
        this.items.sort((a, b) => { console.log(a[col] + ' asc- ' + b[col])
          return a[col] == b[col] ? 0 : a[col] > b[col] ? 1 : -1;
        });
      } else {
        this.items.sort((a, b) => {console.log(a[col] + ' desc- ' + b[col])
          return a[col] == b[col] ? 0 : a[col] < b[col] ? 1 : -1;
        });
      }

      return this.items.filter(res => {
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
      return this.items;
    }
  }
};
</script>

<style scoped>

</style>