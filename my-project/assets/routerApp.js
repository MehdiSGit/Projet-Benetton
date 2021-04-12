import React from "react";
import { BrowserRouter, NavLink, Route } from "react-router-dom";
import Home from "./components/Home"

import CreateCandidate from "./components/CreateCandidate";

export default function App() {
  return (
    <BrowserRouter>


      <NavLink to='/register'>
        Register
      </NavLink>

      <NavLink to='/createCandidate'>
        Create candidate
      </NavLink>

      

      <Route path="/register">
        <Register />
      </Route>


      <Route path="/candidat">
      </Route>

      <Route path="/candidat">
      </Route >

      <Route path="/recruteur">

      </Route>

      <Route>
      </Route>
      <Route path='/createCandidate'>
        <CreateCandidate />
      </Route>

    </BrowserRouter>
  )
}

