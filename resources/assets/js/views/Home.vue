<template>
    <div class="columns">
        <div class="column">
                
            <scale-loader :loading="loading" :color="color"></scale-loader>
        
            <div v-show="!loading">
                
                <div class="card">
                  <header class="card-header">
                    <p class="card-header-title">
                      Thursday (Rd. 64)
                    </p>
                  </header>
                  <div class="card-content">
                    <div class="content">
                      <p class="control has-icon" style="margin-bottom: 0; margin-top: 4px;">
                      <span class="select is-medium">
                        <select id="pick1" v-model="pick1">
                            <option value="Pick #1">Pick #1</option>
                            <option v-for="team in availableTeams" v-bind:value="team.team_name">{{team.team_name}}</option>
                        </select>
                      </span>
                      <span class="select is-medium">
                        <select id="pick2" v-model="pick2">
                          <option value="Pick #2">Pick #2</option>
                          <option v-for="team in availableTeams" v-bind:value="team.team_name">{{team.team_name}}</option>
                        </select>
                      </span>
                    </p>
                    </div>
                  </div>
                  <footer class="card-footer">
                    <a v-on:click="savePicks" class="card-footer-item"><i style="margin-right: 5px;" class="fa fa-check" aria-hidden="true"></i> Save</a>
                  </footer>
                </div>
                
                <div class="card" style="margin-top: 30px;">
                  <header class="card-header">
                    <p class="card-header-title">
                      Teams Used
                    </p>
                  </header>
                  <div class="card-content">
                    <div class="content">
                        <span class="tag is-info" v-for="usedTeam in usedTeams">{{usedTeam.team_name}}</span>
                    </div>
                  </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
    
    import ScaleLoader from 'vue-spinner/src/ScaleLoader.vue';
    
    export default {
        data() {
            return {    
                availableTeams: [],
                usedTeams: [],
                loading: true,
                color: '#3273dc',
                pick1: 'Pick #1',
                pick2: 'Pick #2'
            }  
        },
        components: {
          ScaleLoader  
        },
        created() {
            // TO-DO: this will take the logged in User ID
            
            var vm = this;
                
            function getAvailableTeams() {
              return axios.get('/available-teams/1');
            }

            function getUsedTeams() {
              return axios.get('/used-teams/1');
            }

            axios.all([getAvailableTeams(), getUsedTeams()])
              .then(axios.spread(function (available, used) {
                vm.availableTeams = available.data;
                console.log(available.data);
                
                vm.usedTeams = used.data;
                setTimeout(function() {
                    vm.loading = false;
                }, 200);
              }));         
        },
        methods: {
            savePicks: function() {
                console.log(this.pick1);
                console.log(this.pick2);
                
                if(this.pick1 === this.pick2) {
                    alert('You cant pick the same team twice!')
                }
            }
        }
    }
</script>
