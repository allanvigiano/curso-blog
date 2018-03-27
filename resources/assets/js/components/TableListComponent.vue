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
                    <th v-for="header in headers" :key="header.id">
                        {{ header.name }}
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
  data: function() {
    return {
      search: ""
    };
  },
  props: ["headers", "items", "detail", "token", "edit", "deleteUrl", "create"],
  methods: {
    execForm: function(index) {
      document.getElementById(index).submit();
    }
  },
  computed: {
    filtredList: function() {
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
            return false;
          }
        }
      });
      return this.items;
    }
  }
};
</script>

<style scoped>

</style>