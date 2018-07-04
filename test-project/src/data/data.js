const headersData = [{
    text: "Сотрудник",
    align: "left",
    sortable: true,
    value: "name"
  },
  {
    text: "Компания",
    value: "companyName"
  },
  {
    text: "Должность",
    value: "positionName"
  },
  {
    text: "Дата приема",
    value: "hireDate"
  },
  {
    text: "Дата увольнения",
    value: "fireDate"
  },
  {
    text: "Ставка",
    value: "salary"
  },
  {
    text: "База",
    value: "base"
  },
  {
    text: "Аванс",
    value: "advance"
  },
  {
    text: "Почасовая",
    value: "byHours"
  }]

const employeesData = [
    {
        value: false,
        name: "Джордж Вашингтон",
        companyName: 'ООО "Синергия"',
        positionName: "Первый президент США",
        hireDate: "1789-04-30",
        fireDate: "1797-03-04",
        salary: 1000,
        fraction: 100,
        base: 1000,
        advance: 1000,
        byHours: false
      },
      {
        value: false,
        name: "Ричард I Львиное Сердце",
        companyName: 'ООО "Синергия"',
        positionName: "Король Англии",
        hireDate: "1189-01-01",
        fireDate: "1199-05-17",
        salary: 1000,
        fraction: 100,
        base: 1000,
        advance: 1000,
        byHours: true
      },
      {
        value: false,
        name: "Джейсон Стейтем",
        companyName: 'ООО "Синергия"',
        positionName: "Бейкон",
        hireDate: "1998-09-01",
        fireDate: null,
        salary: 1000,
        fraction: 100,
        base: 1000,
        advance: 1000,
        byHours: false
      },
      {
        value: false,
        name: "Тарантино К. Дж.",
        companyName: 'ООО "Синергия"',
        positionName: "Джимми",
        hireDate: "1994-04-15",
        fireDate: null,
        salary: 1000,
        fraction: 100,
        base: 1000,
        advance: 1000,
        byHours: false
      },
      {
        value: false,
        name: "Камбербэтч Б.",
        companyName: 'ООО "Синергия"',
        positionName: "Смауг",
        hireDate: "1000-01-01",
        fireDate: "2941-10-09",
        salary: 1000,
        fraction: 100,
        base: 1000,
        advance: 1000,
        byHours: false
      },
      {
        value: false,
        name: "Крузенштерн И. Ф.",
        companyName: 'ООО "Синергия"',
        positionName: "Человек и пароход",
        hireDate: "1770-11-08",
        fireDate: null,
        salary: 1000,
        fraction: 100,
        base: 1000,
        advance: 1000,
        byHours: false
      },
      {
        value: false,
        name: "Бендер С. Р.",
        companyName: '"Planet Express"',
        positionName: "Робот-сгибальщик",
        hireDate: "2997-03-27",
        fireDate: null,
        salary: 1000,
        fraction: 100,
        base: 1000,
        advance: 1000,
        byHours: true
      }
]

export { employeesData, headersData };