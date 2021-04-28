import React from 'react'
import ReactDom from 'react-dom'
import Pokedex from './Pokedex'
import {Route, BrowserRouter as Router, Switch} from "react-router-dom"
import PokemonDetails from './components/PokemonDetails'
import NotFound from './components/NotFound'
import PokemonEdit from './components/pokemon-edit'

const routes = (
    <Router>
        <div>
            <Switch>
                <Route exact path={["/","/pokemons", "/pokemon-list"]} component={Pokedex}></Route>
                <Route exact path="/pokemons/:id" component={PokemonDetails}></Route>
                <Route exact path="/pokemons/edit/:id" component={PokemonEdit}></Route>
                <Route component={NotFound}></Route>
            </Switch>
        </div>
    </Router>
)

ReactDom.render(
    routes,
    document.getElementById('root')
)
