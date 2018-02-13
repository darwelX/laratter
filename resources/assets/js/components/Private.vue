<template>
    <div class="private">
      <table>
          <tr>
            <td>
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" v-on:click="chage" v-if="value" checked>
                    <input type="checkbox" class="custom-control-input" v-on:click="chage" v-if="!value">
                    <span class="custom-control-indicator"></span>
                </label>
            </td>
            <td class="pt-self">
                {{message}}
            </td>
          </tr>
      </table>
    </div>
</template>

<script>
    export default {
        props: ['username'],

        data(){
            return {
              message: '',
              value: ''
            }
        },

        mounted(){
                axios.get('/api/state/'+this.username)
                    .then( res =>{
                        // console.log('consultando',res.data)
                        this.message = res.data.state;
                        this.value = res.data.value;
                    })
        },

        methods: {
            chage(){
                axios.get('/api/changestate/'+this.username)
                    .then( res =>{
                        // console.log('cabiando',res.data)
                        this.message = res.data;
                    })
            }
        }
    }
</script>