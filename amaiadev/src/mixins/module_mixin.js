export const module_mixin = {
    methods: {
        updateRadio(e){
            this.$store.commit('updateSyncData',this.surveyKeys[this.currentModule],this.surveyFields[this.currentQuestion],e.target.value)
        }
    }
}