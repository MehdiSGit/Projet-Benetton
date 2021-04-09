import React from 'react';

export default class CreateCandidate extends React.Component {

  constructor() {
    super();
    // ON crée trois state qui correspondent à chacun des champs
    this.state = {
      lastname: '',
      firstname: '',
      email: '',
    }
  }

  render() {
    return (
      <div>
        <label htmlFor="">
          Firstname
          <input type="text" value={this.state.firstname} onChange={this.updateFirstname}/>
        </label>
        <label htmlFor="">
          Lastname
          <input type="text" value={this.state.lastname} onChange={this.updateLastname}/>
        </label>
        <label htmlFor="">
          Email
          <input type="mail" value={this.state.email} onChange={this.updateEmail}/>
        </label>
        <button onClick={this.save}>Save</button>
      </div>
    )
  }

  save = () => {
    console.log(this.state);

    const firstname = this.state.firstname;

    // Destructuring : https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Operators/Destructuring_assignment
    // const {lastname, email} = this.state;

    fetch('http://localhost:8000/api/candidat/create', {
      headers: { // Garder toujours les mêmes headers
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      method: "POST",
      body: JSON.stringify({
        firstname, // <=> firstname: firstname
        lastname: this.state.lastname,
        email: this.state.email,
      })
    })
  }

  updateFirstname = (event) => {
    this.setState({
      firstname: event.target.value,
    })
  }

  updateLastname = (event) => {
    this.setState({
      lastname: event.target.value,
    })
  }

  updateEmail = (event) => {
    this.setState({
      email: event.target.value,
    })
  }
}
