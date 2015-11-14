<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'Sisselogimine';
$lang['login_subheading']      = 'Please login with your email/username and password below.';
$lang['login_identity_label']  = 'Emaili aadress:';
$lang['login_password_label']  = 'Parool:';
$lang['login_remember_label']  = 'Mäleta mind:';
$lang['login_submit_btn']      = 'Logi sisse';
$lang['login_forgot_password'] = 'Unustasid oma parooli?';

// Index
$lang['index_heading']           = 'Kasutajad';
$lang['index_subheading']        = 'All on list kasutajatest.';
$lang['index_fname_th']          = 'Eesnimi';
$lang['index_lname_th']          = 'Perekonnanimi';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Grupid';
$lang['index_status_th']         = 'Staatus';
$lang['index_action_th']         = 'Action';
$lang['index_active_link']       = 'Aktiveeritud';
$lang['index_inactive_link']     = 'Aktiveerimata';
$lang['index_create_user_link']  = 'Loo uus kasutaja';
$lang['index_create_group_link'] = 'Loo uus grupp';

// Deactivate User
$lang['deactivate_heading']                  = 'Deaktiveeri kasutaja';
$lang['deactivate_subheading']               = 'Olete kindel, et soovide deaktiveerida kasutajat \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Jah:';
$lang['deactivate_confirm_n_label']          = 'Ei:';
$lang['deactivate_submit_btn']               = 'Esita';
$lang['deactivate_validation_confirm_label'] = 'Kinnita';
$lang['deactivate_validation_user_id_label'] = 'Kasutaja ID';

// Create User
$lang['create_user_heading']                           = 'Loo kasutaja';
$lang['create_user_subheading']                        = 'Palun sisestage kasutaja informatsioon.';
$lang['create_user_fname_label']                       = 'Eesnimi:';
$lang['create_user_lname_label']                       = 'Perekonnanimi:';
$lang['create_user_identity_label']                    = 'Kasutajanimi:';
$lang['create_user_company_label']                     = 'Company Name:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Phone:';
$lang['create_user_password_label']                    = 'Parool:';
$lang['create_user_password_confirm_label']            = 'Kinnita parool:';
$lang['create_user_submit_btn']                        = 'Loo kasutaja';
$lang['create_user_validation_fname_label']            = 'Eesnimi';
$lang['create_user_validation_lname_label']            = 'Perekonnanimi';
$lang['create_user_validation_identity_label']         = 'Kasutajanimi';
$lang['create_user_validation_email_label']            = 'Emaili Aadress';
$lang['create_user_validation_phone_label']            = 'Phone';
$lang['create_user_validation_company_label']          = 'Company Name';
$lang['create_user_validation_password_label']         = 'Parool';
$lang['create_user_validation_password_confirm_label'] = 'Kinnita parool';

// Edit User
$lang['edit_user_heading']                           = 'Muuda kasutajat';
$lang['edit_user_subheading']                        = 'Palun sisestage kasutaja informatsioon.';
$lang['edit_user_fname_label']                       = 'Eesnimi:';
$lang['edit_user_lname_label']                       = 'Perekonnanimi:';
$lang['edit_user_company_label']                     = 'Company Name:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Phone:';
$lang['edit_user_password_label']                    = 'Parool: (kui vahetate parooli)';
$lang['edit_user_password_confirm_label']            = 'Kinnita parool: (kui vahetate parooli)';
$lang['edit_user_groups_heading']                    = 'Gruppide liige';
$lang['edit_user_submit_btn']                        = 'Salvesta kasutaja';
$lang['edit_user_validation_fname_label']            = 'Eesnimi';
$lang['edit_user_validation_lname_label']            = 'Perekonnanimi';
$lang['edit_user_validation_email_label']            = 'Emaili Aadress';
$lang['edit_user_validation_phone_label']            = 'Phone';
$lang['edit_user_validation_company_label']          = 'Company Name';
$lang['edit_user_validation_groups_label']           = 'Grupid';
$lang['edit_user_validation_password_label']         = 'Parool';
$lang['edit_user_validation_password_confirm_label'] = 'Kinnita parooli';

// Create Group
$lang['create_group_title']                  = 'Loo grupp';
$lang['create_group_heading']                = 'Loo grupp';
$lang['create_group_subheading']             = 'Palun sisestage grupi informatsioon.';
$lang['create_group_name_label']             = 'Grupi nimi:';
$lang['create_group_desc_label']             = 'Kirjeldus:';
$lang['create_group_submit_btn']             = 'Loo grupp';
$lang['create_group_validation_name_label']  = 'Grupi nimi';
$lang['create_group_validation_desc_label']  = 'Kirjeldus';

// Edit Group
$lang['edit_group_title']                  = 'Muuda gruppi';
$lang['edit_group_saved']                  = 'Grupp salvestatud';
$lang['edit_group_heading']                = 'Muuda gruppi';
$lang['edit_group_subheading']             = 'Palun sisestage grupi informatsioon.';
$lang['edit_group_name_label']             = 'Grupi nimi:';
$lang['edit_group_desc_label']             = 'Kirjeldus:';
$lang['edit_group_submit_btn']             = 'Salvesta muudatused';
$lang['edit_group_validation_name_label']  = 'Grupi nimi';
$lang['edit_group_validation_desc_label']  = 'Kirjeldus';

// Change Password
$lang['change_password_heading']                               = 'Muuda parooli';
$lang['change_password_old_password_label']                    = 'Vana parool:';
$lang['change_password_new_password_label']                    = 'Uus parool (Peab olema vähemalt %s märki pikk):';
$lang['change_password_new_password_confirm_label']            = 'Kinnita uut parooli:';
$lang['change_password_submit_btn']                            = 'Muuda';
$lang['change_password_validation_old_password_label']         = 'Vana parool';
$lang['change_password_validation_new_password_label']         = 'Uus parool';
$lang['change_password_validation_new_password_confirm_label'] = 'Kinnita uut parooli';

// Forgot Password
$lang['forgot_password_heading']                 = 'Unustasin parooli';
$lang['forgot_password_subheading']              = 'Palun sisestage oma %s, et saaksime saata teie emaili parooli taastamiseks.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Esita';
$lang['forgot_password_validation_email_label']  = 'Email Aadress';
$lang['forgot_password_username_identity_label'] = 'Kasutajanimi';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Sellist emaili aadressi ei leitud.';

// Reset Password
$lang['reset_password_heading']                               = 'Muuda parooli';
$lang['reset_password_new_password_label']                    = 'Uus parool (Peab olema vähemalt %s märki pikk):';
$lang['reset_password_new_password_confirm_label']            = 'Kinnita uut parooli:';
$lang['reset_password_submit_btn']                            = 'Muuda';
$lang['reset_password_validation_new_password_label']         = 'Uus parool';
$lang['reset_password_validation_new_password_confirm_label'] = 'Kinnita uut parooli';

// Activation Email
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';

// Forgot Password Email
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';

// New Password Email
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';

