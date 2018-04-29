const setA = {
  from: 6,
  to: 9
}

const setSum = {
  from: 11,
  to: 14
}

const getRandom = function (min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min
}

const getFirstNumber = () => {
  return getRandom(setA.from, setA.to)
}

const getSum = () => {
  return getRandom(setSum.from, setSum.to)
}

const getSecondNumber = () => {
  return getSum() - getFirstNumber()
}

const firstNumber = getFirstNumber()
const sum = getSum()
const secondNumber = getSecondNumber()

export {firstNumber, sum, secondNumber}
