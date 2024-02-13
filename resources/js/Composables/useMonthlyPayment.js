import { computed, isRef } from 'vue';

export const useMonthlyPayment = (totalPrice, interestRate, duration) => {
   const totalPriceComputed = computed(() => isRef(totalPrice) ? totalPrice.value : totalPrice);
   const interestRateComputed = computed(() => isRef(interestRate) ? interestRate.value : interestRate);
   const durationComputed = computed(() => isRef(duration) ? duration.value : duration);

   const monthlyPayment = computed(() => {
      const principle = totalPriceComputed.value;
      const monthlyInterest = interestRateComputed.value / 100 / 12;
      const numberOfPaymentMonths = durationComputed.value * 12;
      return principle * monthlyInterest * 
      (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1)
   });

   const totalPaid = computed(() => durationComputed.value * 12 * monthlyPayment.value);

   const totalInterest = computed(() => totalPaid.value - totalPriceComputed.value)

   return { monthlyPayment, totalPaid, totalInterest }
}