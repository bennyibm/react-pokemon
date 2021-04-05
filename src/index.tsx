import React from 'react'
import ReactDom from 'react-dom'
import Formulaire from './Formulaire'
import Pokedex from './Pokedex'

ReactDom.render(
    <Pokedex />,
    document.getElementById('root')
)
ReactDom.render(<Formulaire />, document.getElementById("formulaire"))