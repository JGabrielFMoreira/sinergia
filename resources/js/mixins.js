import numeral from "numeral";
import {
    DateTime
} from "luxon";

let locales = require('numeral/locales');

const mixin = {
    methods: {
    titleText(texto) {
      return _.startCase(_.toLower((texto)));
    },
        matchAll(s, re) {
            let m;
            do {
                m = re.exec(s);
                if (m) {
                    console.log(m[1], m[2]);
                }
            } while (m);
        },
        formatValue(valor) {
            return numeral(valor).format('0,0,0,0,0,0.00')
        },
        formatDate(inDate) {
            return !inDate || !inDate.length ? '' : DateTime.fromISO(inDate).toFormat('dd/MM/yyyy');
        },
        formatDateTime(inDate) {
          return !inDate || !inDate.length ? '' : DateTime.fromISO(inDate).toFormat('dd/MM/yyyy HH:mm:ss');
        },
        toDateTimeIso(inDate) {
             return !inDate || !inDate.length   ? '' :DateTime.fromISO(inDate).toFormat('yyyy-MM-dd HH:mm:ss');
        }
    }
}

export default mixin;
