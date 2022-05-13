import { errorLogin, startLogin, successLogin } from '../../slices/auth/authSlice';

/**
 * @function {object} - Action to start the login process
 * @name SignIn
 * @category Redux Actions
 * @description Sign in user action creator function that dispatches the startLogin, successLogin and errorLogin actions
 * @param {string} user - User email
 * @param {string} password - User password
 * @returns {Promise<void>}
 */
export const SignIn = (user, password) => async (dispatch) => {
  try {
    dispatch(startLogin());
    const data = {
      nickname: user,
      password
    };

    dispatch(successLogin());
  } catch (e) {
    dispatch(
      errorLogin({
        code: e.response.status || '',
        error: e.response.data || e.message()
      })
    );
  }
};
