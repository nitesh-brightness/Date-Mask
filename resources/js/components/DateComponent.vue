<template>
    <input class="custom-date-input" ref="dmInput" v-model="dateVal" v-on:keyup="keyHandler($event)" type="text">
</template>

<script>
import moment from 'moment';

export default {
    data() {
        return {
            dateVal: '__/__/____'
        }
    },
    methods: {
        keyHandler(event) {
            let keys = [37, 38, 39, 40];
            console.log('code', event.keyCode);
            if (!keys.includes(event.keyCode)) {
                console.log(event);
                let initialMask = '__/__/____';
                let masked = [];
                let msk = initialMask.split('');
                let inputEl = this.$refs.dmInput;
                let s = inputEl.selectionStart - 1;
                msk.forEach((el, n) => {
                    let numbersOnly = /^\d+$/;
                    let isDigit = numbersOnly.test(this.dateVal.charAt(n));
                    let slashes = [2, 5];
                    let zeroAble = [1, 4];
                    if (!(slashes.includes(n))) {
                        if (zeroAble.includes(n)) {
                            // push zero to month/day
                            if (isDigit && this.dateVal.charAt(n - 1) === '_') {
                                masked.splice(n - 1, 1, 0);
                            }
                        }
                        // push regular
                        masked.push((isDigit ? this.dateVal.charAt(n) : '_'));

                        //  check month validation
                        if (n === 1) {
                            if (!moment(masked[0] + masked[1], 'MM').isValid()) {
                                masked.splice(0, 2, '_', '_');
                            }
                        }

                        // check for day validation
                        if (n === 4) {
                            if (masked[0] === '_' || masked[1] === '_') {
                                if (!moment(masked[3] + masked[4], 'DD').isValid()) {
                                    masked.splice(3, 4, '_', '_');
                                }
                            } else {
                                if (masked[6] === '_' || masked[7] === '_' || masked[8] === '_' || masked[9] === '_') {
                                    if (!moment(masked[0] + masked[1] + '/' + masked[3] + masked[4], 'MM/DD').isValid()) {
                                        masked.splice(3, 4, '_', '_');
                                    }
                                } else {
                                    if (!moment(masked[0] + masked[1] + '/' + masked[3] + masked[4] +
                                        '/' + masked[6] + masked[7] + masked[8] + masked[9], 'MM/DD/YYYY').isValid()) {
                                        masked.splice(3, 4, '_', '_');
                                    }
                                }
                            }
                        }

                        // update cursor position
                        if (isDigit && s === n && (this.dateVal.charAt(n) !== "_" || this.dateVal.charAt(n) !== "/")) {
                            s++;
                        }
                    } else {
                        masked.splice(n, 1, '/');
                        if (s === n) {
                            masked.push((isDigit ? this.dateVal.charAt(n) : '_'));
                            s++;
                        }
                    }
                    console.log(el, n, this.dateVal.charAt(n));
                });
                this.dateVal = masked.join("");
                inputEl.selectionStart = inputEl.selectionEnd = s < 0 ? 0 : s;
                setTimeout(function () {
                    inputEl.selectionStart = inputEl.selectionEnd = s < 0 ? 0 : s;
                }, 0);
            }
        },
    }
}
</script>

<style>
</style>
