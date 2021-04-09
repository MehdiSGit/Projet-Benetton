// Miel.jsx 

import React from 'react';
import { port } from "../envjs";

export default class MielPage extends React.Component {

  constructor() {
    super();
    this.state = {
      miels: [],
    }
  }

  render() {
    return (
      <div>
        {/*{this.state.miels.map(miel => <p>{miel}</p>)}*/}
        {this.state.miels.map(function(miel) {
          return (
            <p>
              {miel}
            </p>
          )
        })}
        <button onClick={this.fetchMiels}>Fetch Miel </button>
      </div>
    )
  }

  fetchMiels = () => {
    console.log(port);
    fetch('http://localhost:' + port + '/api/miel').then(response => response.json()).then(response => {
      console.log(response);
      this.setState({
        miels: response.data,
      })
    })
  }
}


// envjs.js

/**
 * Ce fichier sert à préciser quel est le port qu'on veut utiliser, car il change d'un ordinateur à l'autre
 */

export const port = '8000';

