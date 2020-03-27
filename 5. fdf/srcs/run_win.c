/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   run_win.c                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/06/09 04:58:56 by jeagan            #+#    #+#             */
/*   Updated: 2019/07/09 14:07:32 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "f_d_f.h"

int		init_win(t_var *try)
{
	if (!try->ptr)
	{
		if (!((try->ptr) = (t_ptr *)malloc(sizeof(t_ptr))))
			return (free_err(try, 3, "[malloc > t_ptr]"));
		if (!(try->ptr->bonus = (t_bonus *)malloc(sizeof(t_bonus))))
			return (free_err(try, 3, "[malloc > t_bonus]"));
	}
	try->ptr->bonus->z = 2.;
	try->ptr->bonus->zrot = 2;
	try->ptr->bonus->debug = 1;
	try->ptr->bonus->hud = 1;
	try->ptr->bonus->iso = 0;
	try->ptr->bonus->xmv = 0.;
	try->ptr->bonus->ymv = 0.;
	try->ptr->bonus->extra = 0;
	try->ptr->bonus->zoom = (WIN_HEIGHT / 2) / try->height;
	return (1);
}

void	write_pixel(int x, int y, int color, t_var *try)
{
	unsigned int	i;

	if (x < WIN_WIDTH && y < WIN_HEIGHT && x >= 0 && y >= 0)
	{
		i = (x * try->ptr->effect_bpp) + (y * try->ptr->s_l);
		*(int*)(try->ptr->image + i) = color;
	}
}

int		run_win(t_var *try)
{
	if (!init_win(try))
		return (free_err(try, 2, "[init windows in run_win]"));
	if (!(try->ptr->mlx = mlx_init()))
		return (free_err(try, 2, "[init mlx in run_win]"));
	if (!(try->ptr->win = mlx_new_window(try->ptr->mlx, WIN_WIDTH,
						WIN_HEIGHT, try->name)))
		return (free_err(try, 2, "[new windows in run_win]"));
	if (!(try->ptr->img = mlx_new_image(try->ptr->mlx, WIN_WIDTH, WIN_HEIGHT)))
		return (free_err(try, 2, "[new image in run_win]"));
	if (!(try->ptr->image = mlx_get_data_addr(try->ptr->img, &(try->ptr->bpp),
						&(try->ptr->s_l), &(try->ptr->endian))))
		return (free_err(try, 2, "[address image in run_win]"));
	try->ptr->effect_bpp = try->ptr->bpp >> 3;
	draw_win(try);
	mlx_hook(try->ptr->win, 2, 0, hook, try);
	mlx_hook(try->ptr->win, 17, 0, x_even, try);
	mlx_loop(try->ptr->mlx);
	free_tab(NULL, try->stck, try->height);
	return (1);
}
