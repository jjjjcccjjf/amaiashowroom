<template>
    <div v-if="this.currentModule == 6">
        <h5>AGREEMENT</h5>
          
          <p class="agreement">
            By providing us your personal data including but not limited to your name, gender, civil status, birth, address, telephone or mobile numbers, email address, and any other information relating to you which you have provided us in answering this survey, you agree to the processing and use of your personal data.
          </p>
          <p class="agreement"><a href="#">View Amaia Privacy Policy</a></p>
          <p class="agreement">
            By clicking submit, you confirm your agreement to the terms and conditions contained in Amaia’s privacy policy.
          </p>
          <p class="agreement"><input @click="handleSubmit" type="submit" name="" value="SUBMIT"></p>
    </div>
</template>

<script>
import { mixin } from '../mixins/mixin.js'
import { module_mixin } from '../mixins/module_mixin.js'
    export default {
        mixins: [ mixin, module_mixin],
        methods: {
            handleSubmit(){
                this.$store.dispatch('submitSurvey')
            }
        }
    }
</script>

<style scoped>

</style>