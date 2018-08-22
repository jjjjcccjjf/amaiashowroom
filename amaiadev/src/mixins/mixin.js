import { mapGetters } from 'vuex'
export const mixin = {
    computed: {
        ...mapGetters({
          currentQuestion: 'getCurrentQuestion',
          currentModule: 'getCurrentModule',
          totalQuestions: 'getTotalQuestions',
          survey: 'getSurvey',
          currentModuleName: 'getCurrentModuleName',
          surveyKeys: 'getSurveyKeys',
          surveyFields: 'getSurveyFields',
          storeOthers: 'getOthers',
          showroomURL: 'getShowroomURL',
          minInArray: 'getMinInArray',
          maxInArray: 'getMaxInArray',
          personalInfo: 'getPersonalInfo',
          metaInfo: 'getMeta'
        })
    }
}