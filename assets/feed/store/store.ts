import { createStore, applyMiddleware, compose } from 'redux';
import thunk from 'redux-thunk';
import reducer from '../reducers/reducers';
import projectsMiddleware from '../middlewares/projectsMiddleware';
import userMiddleware from "../middlewares/userMiddleware";

declare global {
  interface Window {
    __REDUX_DEVTOOLS_EXTENSION_COMPOSE__?: typeof compose;
  }
}

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

const enhancers = composeEnhancers(
  applyMiddleware(
    thunk,
    projectsMiddleware,
    userMiddleware,
  ),
);

const store = createStore(reducer, enhancers);

export default store;
