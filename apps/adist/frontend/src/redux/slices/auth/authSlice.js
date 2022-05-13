import { createSlice } from '@reduxjs/toolkit';

const initialState = {
  isLogged: false,
  loading: false,
  error: null,
  errorCode: null
};

/**
 * @category Redux Slice
 * @function authSlice - slice for auth reducer and actions for auth reducer
 * @description slice for auth reducer and actions for auth reducer
 * @param {object} state
 * @param {object} action
 * @returns {object} The new state of the slice after the action has been applied to it (or the same state if the action has no effect)
 */
const authSlice = createSlice({
  name: 'auth',
  initialState,
  reducers: {
    startLogin(state) {
      state.loading = true;
      state.error = null;
    },
    successLogin(state) {
      state.loading = false;
      state.isLogged = true;
    },
    errorLogin(state, action) {
      state.loading = false;
      state.error = action.payload.error;
      state.errorCode = action.payload.code;
    },
    resetLogin() {
      return initialState;
    },
    logout: () => {}
  }
});

const { actions, reducer } = authSlice;
export const { startLogin, successLogin, errorLogin, resetLogin, logout } = actions;
export default reducer;
