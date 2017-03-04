<template>
    <div class="columns">
        <div class="column">
            
            <scale-loader :loading="loading" :color="color"></scale-loader>
            
            <div v-show="!loading">
                <table class="table">
                  <thead>
                    <tr>
                      <th><abbr title="Name"></abbr></th>
                      <th>Thu (64)</th>
                      <th>Thu (64)</th>
                      <th>Fri (64)</th>
                      <th>Fri (64)</th>
                      <th>Sat (32)</th>
                      <th>Sun (32)</th>
                      <th>Thu (16)</th>
                      <th>Fri (16)</th>
                      <th>Sat (8)</th>
                      <th>Sun (8)</th>
                      <th>Sat (4)</th>
                      <th>Mon (2)</th>  
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th><abbr title="Name"></abbr></th>
                      <th>Thu (64)</th>
                      <th>Thu (64)</th>
                      <th>Fri (64)</th>
                      <th>Fri (64)</th>
                      <th>Sat (32)</th>
                      <th>Sun (32)</th>
                      <th>Thu (16)</th>
                      <th>Fri (16)</th>
                      <th>Sat (8)</th>
                      <th>Sun (8)</th>
                      <th>Sat (4)</th>
                      <th>Mon (2)</th>  
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr v-for="user in users">
                      <th style="text-align: left;">{{user.name}}</th>
                      <td v-for="pick in user.picks"><span v-bind:class="{ winner: pick.result === 1, loser: pick.result === 0 }" v-if="pick.is_visible">{{pick.team_name}}</span></td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import ScaleLoader from 'vue-spinner/src/ScaleLoader.vue';
    
    export default {
        
        data() {
            return {    
                users: [],
                visible_slots: [],
                loading: true,
                color: '#3273dc'
            }  
        },
        components: {
          ScaleLoader  
        },
        created() {
            
            var vm = this;
            
            axios.get('/users')
                .then(function(response) {
                    
                    vm.users = response.data;
                    
                    setTimeout(function() {
                        vm.loading = false;
                    }, 200);
                    
                });  
        }
    }
</script>
