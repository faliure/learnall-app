declare var responsiveVoice: any;

const langVoiceMap = {
    English     : 'US English Female',
    Portuguese  : 'Brazilian Portuguese Female',
    Catalan     : 'Catalan Male',
    Esperanto   : 'Esperanto Male',
    Welsh       : 'Welsh Male',
    Swahili     : 'Swahili Male',
    German      : 'Deutsch Female',

    Ukrainian        : 'Ukrainian Female',
    Bengali          : null,
    Irish            : null,
    'Scottish Gaelic': null,
    Hebrew           : null,
    'Haitian Creole' : null,
    Hawaiian         : null,
    Yiddish          : null,
    Zulu             : null,
};

const languageNameToVoice = (language: string) => langVoiceMap[language] || `${language} Female`;

export const speak = (text: string, language: string, rate = 1) => {

    responsiveVoice.speak(text, languageNameToVoice(language), { rate });
};
