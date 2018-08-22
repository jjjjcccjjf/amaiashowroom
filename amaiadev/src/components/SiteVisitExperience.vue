<template>
    <div>
      <BasicRadioSurvey heading="Appearance and orderliness of the site's main entrance" modulename="site_visit_experience" fieldname="sve_appearance" v-if="currentModule == 2 && currentQuestion == 1" />
      <BasicRadioSurvey heading="Attractiveness and cleanliness of the interiors of the model units" modulename="site_visit_experience" fieldname="sve_attractiveness" v-if="currentModule == 2 && currentQuestion == 2" />
      <BasicRadioSurvey heading="Orderliness outside the site’s model block/model units" modulename="site_visit_experience" fieldname="sve_orderliness" v-if="currentModule == 2 && currentQuestion == 3" />
      <BasicRadioSurvey heading="Safety and security at the site" modulename="site_visit_experience" fieldname="sve_safety" v-if="currentModule == 2 && currentQuestion == 4" />
      <BasicRadioSurvey heading="Accessibility/location of the site" modulename="site_visit_experience" fieldname="sve_accessibility" v-if="currentModule == 2 && currentQuestion == 5" />
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