<template>
	<div>
		<div class="notification is-primary" v-if="this.isSuccess">
		  {{this.successMessage}}
		</div>

		<div class="notification is-danger" v-if="this.isError">
	        {{this.errorMessage}}
	    </div>

		<div class="card">
	      <header class="card-header">
	        <p class="card-header-title">
	          {{this.openDay}}
	        </p>
	      </header>
	      <div class="card-content">
	        <div class="content">
	          <p class="control has-icon" style="margin-bottom: 0; margin-top: 4px;">
	          <span class="select is-medium">
	            <select id="pick1" v-model="pick1">
	                <option value="Pick #1">Select Team</option>
	                <option v-for="team in availableTeams" v-bind:value="team.team_name">{{team.team_name}}</option>
	            </select>
	          </span>
	          <span class="select is-medium" v-if="this.openDay === 'Thursday (64)' || this.openDay === 'Friday (64)'">
	            <select id="pick2" v-model="pick2">
	              <option value="Pick #2">Select Team</option>
	              <option v-for="team in availableTeams" v-bind:value="team.team_name">{{team.team_name}}</option>
	            </select>
	          </span>
	        </p>
	        </div>
	      </div>
	      <footer class="card-footer">
	        <a id="savePicksBtn" class="button is-info is-large" v-on:click="savePicks"><i class="fa fa-check" aria-hidden="true"></i></a>
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
</template>


<script>
	export default {
		data() {
			return {
				openDay: null,
				availableTeams: [],
				usedTeams: [],
				pick1: 'Pick #1',
	            pick2: 'Pick #2',
	            isError: false,
	            isSuccess: false,
	            errorMessage: null,
	            successMessage: null
			}
		},
		created() {
            // TO-DO: this will take the logged in User ID
            // check if user has been eliminated

            var vm = this;

            function getOpenDay() {
            	return axios.get('/get-open-day');
            }

            function getAvailableTeams() {
              return axios.get('/available-teams/1');
            }

            function getUsedTeams() {
              return axios.get('/used-teams/1');
            }

            axios.all([getOpenDay(), getAvailableTeams(), getUsedTeams()])
              .then(axios.spread(function (open, available, used) {
                vm.openDay = open.data.day;
                vm.availableTeams = available.data;

                vm.usedTeams = used.data;
                setTimeout(function() {
                    vm.$emit('finished');
                }, 200);
              }));
        },
        methods: {
            savePicks: function() {

                $('#savePicksBtn').addClass('is-loading');

                // if two picks (Thurs/Fri rd. 1)
                if(this.openDay === 'Thursday (64)' || this.openDay === 'Friday (64)') {
                	// check if both picks made
                	if(this.pick1 === 'Pick #1' || this.pick2 === 'Pick #2') {
                		this.isSuccess = false;
                		this.successMessage = null;
                		this.errorMessage = "You didn't make all your picks. Kill yourself.";
	                    this.isError = true;
	                    $('#savePicksBtn').removeClass('is-loading');
                	} else if(this.pick1 === this.pick2) { // check if picks are the same team
	                    this.isSuccess = false;
                		this.successMessage = null;
	                    this.errorMessage = "You can't pick the same team twice. Kill yourself.";
	                    this.isError = true;
	                    $('#savePicksBtn').removeClass('is-loading');
	                } else { // save the picks
	                	var vm = this;
	                	
	                	if(this.openDay === 'Thursday (64)') {
	                		var slot1 = 1;
	                		var slot2 = 2;
	                	} else if(this.openDay === 'Friday (64)') {
	                		var slot1 = 3;
	                		var slot2 = 4;
	                	}
	                	
	                	// TO-DO pass the logged in user ID
	                	axios.post('/save-picks/1', {
						    pick1: this.pick1,
						    pick2: this.pick2,
						    slot1: slot1,
						    slot2: slot2
						  })
						  .then(function (response) {
						    console.log(response);
						    vm.errorMessage = null;
		                    vm.isError = false;
		                    vm.isSuccess = true;
		                    vm.successMessage = "Your picks were saved successfully.";
		                    $('#savePicksBtn').removeClass('is-loading');
						  })
						  .catch(function (error) {
						    console.log(error);
						  });
	                }
                } else {
                	var vm = this;
                	var slot1;
                	
                	switch(this.openDay) {
					    case 'Saturday (32)':
					        slot1 = 5;
					        break;
					    case 'Sunday (32)':
					        slot1 = 6;
					        break;
					    case 'Thursday (16)':
					        slot1 = 7;
					        break;
					    case 'Friday (16)':
					        slot1 = 8;
					        break;
					    case 'Saturday (8)':
					        slot1 = 9;
					        break;            
					    case 'Sunday (8)':
					        slot1 = 10;
					        break;
					    case 'Saturday (4)':
					        slot1 = 11;
					        break;
					    case 'Monday (2)':
					        slot1 = 12;
					        break;        
					}
					
					axios.post('/save-picks/1', {
					    pick1: this.pick1,
					    slot1: slot1
					  })
					  .then(function (response) {
					    console.log(response);
					    vm.errorMessage = null;
	                    vm.isError = false;
	                    vm.isSuccess = true;
	                    vm.successMessage = "Your picks were saved successfully.";
	                    $('#savePicksBtn').removeClass('is-loading');
					  })
					  .catch(function (error) {
					    console.log(error);
					  });

                }

            }
        }
	}
</script>
