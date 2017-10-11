var person = {
  name: 'YJob',
  friends: ['JavaScript','Vue','Html']
}

var anotherPerson = Object.create(person,{
  name: {
    value: 'WriteJob'
  },
  friends: {
    value: ['CSS','jQuery']
  }
});

anotherPerson.name = '977';
anotherPerson.friends.push('R'); 

var yesAnotherPerson = Object.create(person,{
  name: {
    value: 'WhyJob'
  }
});

yesAnotherPerson.name = 'JaCK';
yesAnotherPerson.friends.push('another'); 

console.log(person.name);                 //YJob
console.log(person.friends);              //["JavaScript", "Vue", "Html", "another"]

console.log(anotherPerson.name);          //WriteJob
console.log(anotherPerson.friends);       //["CSS", "jQuery", "R"]

console.log(yesAnotherPerson.name);       //WhyJob
console.log(yesAnotherPerson.friends);    //["JavaScript", "Vue", "Html", "another"]