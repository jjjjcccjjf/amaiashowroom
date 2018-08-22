<template>
    <div>
      <BasicRadioSurvey heading="Design and lay-out of the units/buildings" modulename="product" fieldname="p_design" v-if="currentModule == 4 && currentQuestion == 1" />
      <BasicRadioSurvey heading="Finishes and inclusions of the units" modulename="product" fieldname="p_finishes" v-if="currentModule == 4 && currentQuestion == 2" />
      <BasicRadioSurvey heading="Sizes of the units" modulename="product" fieldname="p_sizes" v-if="currentModule == 4 && currentQuestion == 3" />
      <BasicRadioSurvey heading="Amenities (pool, clubhouse/function rooms, playground, etc.)" modulename="product" fieldname="p_amenities" v-if="currentModule == 4 && currentQuestion == 4" />
      <BasicRadioSurvey heading="Pricing of the units" modulename="product" fieldname="p_pricing" v-if="currentModule == 4 && currentQuestion == 5" />
      <BasicRadioSurvey heading="Available payment terms/financing options" modulename="product" fieldname="p_available" v-if="currentModule == 4 && currentQuestion == 6" />
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