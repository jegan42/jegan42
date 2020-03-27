/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   draw_win.c                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/07/05 12:06:34 by jeagan            #+#    #+#             */
/*   Updated: 2019/07/09 14:07:49 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "f_d_f.h"

static void				put_str(int x, int y, char *str, t_var *try)
{
	mlx_string_put(try->ptr->mlx, try->ptr->win, x, y, C_WHITE, str);
}

static void				put_in_box(t_var *try)
{
	try->j = 0;
	while (try->j <= WIN_HEIGHT / 30 && !(try->i = 0))
	{
		while (try->i <= WIN_WIDTH)
			write_pixel((try->i)++, try->j, C_RED, try);
		(try->j)++;
	}
	try->i = WIN_WIDTH - (HUD_WIDTH + HUD_WOFFSET);
	try->j = WIN_HEIGHT / 10 - 10;
	while (try->i <= (WIN_WIDTH - HUD_WOFFSET))
		write_pixel((try->i)++, try->j, C_GREEN, try);
	while (try->j <= WIN_HEIGHT / 10 + (HUD_HEIGHT + 5))
		write_pixel(try->i, (try->j)++, C_GREEN, try);
	while (try->i >= WIN_WIDTH - (HUD_WIDTH + HUD_WOFFSET))
		write_pixel(try->i--, try->j, C_GREEN, try);
	while (try->j >= WIN_HEIGHT / 10 - 10)
		write_pixel(try->i, try->j--, C_GREEN, try);
	try->j = WIN_HEIGHT / 10 - 5;
	while (try->j < WIN_HEIGHT / 10 + HUD_HEIGHT)
	{
		try->i = WIN_WIDTH - (HUD_WIDTH + HUD_WOFFSET - 5);
		while (try->i < WIN_WIDTH - (HUD_WOFFSET + 5))
			write_pixel((try->i)++, try->j, C_BLUE, try);
		(try->j)++;
	}
}

static void				put_log(t_var *try)
{
	char buf[32];

	put_str(50, WIN_HEIGHT / 10, "Z:", try);
	put_str(200, WIN_HEIGHT / 10, put_nb_buf(buf, try->ptr->bonus->z, 32), try);
	put_str(50, WIN_HEIGHT / 10 + 20, "Z Axis:", try);
	put_str(200, WIN_HEIGHT / 10 + 20,
				put_nb_buf(buf, try->ptr->bonus->zrot, 32), try);
	put_str(50, WIN_HEIGHT / 10 + 40, "Zoom:", try);
	put_str(200, WIN_HEIGHT / 10 + 40,
				put_nb_buf(buf, try->ptr->bonus->zoom, 32), try);
	put_str(50, WIN_HEIGHT / 10 + 60, "Pos X:", try);
	put_str(200, WIN_HEIGHT / 10 + 60,
				put_nb_buf(buf, try->ptr->bonus->xmv, 32), try);
	put_str(50, WIN_HEIGHT / 10 + 80, "Pos Y:", try);
	put_str(200, WIN_HEIGHT / 10 + 80,
				put_nb_buf(buf, try->ptr->bonus->ymv, 32), try);
	put_str(50, WIN_HEIGHT / 10 + 100, "Projection:", try);
	put_str(200, WIN_HEIGHT / 10 + 100,
				try->ptr->bonus->iso ? "2:1 Isometric" : "Isometric", try);
	put_str(50, WIN_HEIGHT / 10 + 120, "Mode:", try);
	put_str(200, WIN_HEIGHT / 10 + 120,
				try->ptr->bonus->extra ? "Extra" : "Normal", try);
}

static void				put_txt(t_var *try)
{
	put_str(5, WIN_HEIGHT - 20, try->name, try);
	put_str(HUDX, WIN_HEIGHT / 10, "[ESC] Exit", try);
	put_str(HUDX, WIN_HEIGHT / 10 + 20, "[+/-] Zoom In/Out", try);
	put_str(HUDX, WIN_HEIGHT / 10 + 40, "[1] Dec Height", try);
	put_str(HUDX, WIN_HEIGHT / 10 + 60, "[2] Inc Height", try);
	put_str(HUDX, WIN_HEIGHT / 10 + 80, "[=] Menu", try);
	put_str(HUDX, WIN_HEIGHT / 10 + 100, "[.] HUD On/Off", try);
	put_str(HUDX, WIN_HEIGHT / 10 + 120, "[7 - 8] Z-Axis", try);
	put_str(HUDX, WIN_HEIGHT / 10 + 140, "[CLEAR] Reset", try);
	put_str(HUDX, WIN_HEIGHT / 10 + 160, "[/] = Switch View", try);
	put_str(HUDX, WIN_HEIGHT / 10 + 180, "[*] = Extra Mode", try);
	put_str(HUDX, WIN_HEIGHT / 10 + 200, "Arrows = Movement", try);
	put_str(WIN_WIDTH / 2 - 50, 12, "F D F", try);
}

void					draw_win(t_var *try)
{
	draw_map(try);
	if (try->ptr->bonus->hud)
		put_in_box(try);
	mlx_put_image_to_window(try->ptr->mlx, try->ptr->win, try->ptr->img, 0, 0);
	if (try->ptr->bonus->hud)
	{
		put_txt(try);
		if (try->ptr->bonus->debug)
			put_log(try);
	}
}
