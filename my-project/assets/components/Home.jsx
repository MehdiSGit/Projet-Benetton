import React from 'react';
import {Link} from "react-router-dom";


class Home extends React.Component {

  render() {
    return (
      <div>

        {/*<div className="alert alert-success">{{message}}</div>*/}

        <Link to='/register'>Register</Link>
        {/* Ne pas oublier de remplacer les a par des Link, et les href par des to*/}
        <a>Sign in</a>
        <a>Mon espace candidat</a>
        <a>Mon espace recruteur</a>
      </div>
    )
  }

}

export default Home

