<template>
    <div>
      <BasicRadioSurvey heading="Cleanliness and orderliness of the showroom/sales office" modulename="showroom_sales_office_model_unit" fieldname="ssomu_cleanliness" v-if="currentModule == 3 && currentQuestion == 1" />
      <BasicRadioSurvey heading="Safety and security of the showroom/sales office" modulename="showroom_sales_office_model_unit" fieldname="ssomu_safety" v-if="currentModule == 3 && currentQuestion == 2" />
      <BasicRadioSurvey heading="Completeness of information at the showroom/sales office" modulename="showroom_sales_office_model_unit" fieldname="ssomu_completeness" v-if="currentModule == 3 && currentQuestion == 3" />
      <BasicRadioSurvey heading="Accessibility/location of the showroom/sales office" modulename="showroom_sales_office_model_unit" fieldname="ssomu_accessibility" v-if="currentModule == 3 && currentQuestion == 4" />
      <BasicRadioSurvey heading="Comfort at the showroom/sales office (eg. temperature, noise levels)" modulename="showroom_sales_office_model_unit" fieldname="ssomu_comfort" v-if="currentModule == 3 && currentQuestion == 5" />
    </div>
</template>

<script>
import { mixin } from '../mixins/mixin.js'
import { module_mixin } from '../mixins/module_mixin.js'
import BasicRadioSurvey from './BasicRadioSurvey.vue'
    export default {
        components: { BasicRadioSurvey },
        mixins: [ mixin, module_mixin ]
    }
</script>

<style scoped>

</style>