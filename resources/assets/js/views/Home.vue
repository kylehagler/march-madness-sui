<template>
    <div class="columns">
        <div class="column">
                
            <scale-loader :loading="loading" :color="color"></scale-loader>
        
            <div v-show="!loading">
                
                <pick-card loading="true" v-on:finished="doneLoading"></pick-card>

            </div>
            
        </div>
    </div>
</template>

<script>
    
    import ScaleLoader from 'vue-spinner/src/ScaleLoader.vue';
    import PickCard from '../components/PickCard.vue'
    
    export default {
        data() {
            return {
                usedTeams: [],
                color: '#3273dc',
                loading: true
            }  
        },
        components: {
          ScaleLoader,
          PickCard
        },
        methods: {
            doneLoading: function() {
              this.loading = false;
            }
        }
    }
</script>
